<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\Dimension;
use App\Models\Post;
use Exception;

class GoogleAnalyticsService
{
    protected $analytics;

    public function __construct()
    {
        try {
            $this->analytics = new BetaAnalyticsDataClient([
                'credentials' => storage_path('app/google/analityc-ftnews-8437fc4bb81f.json'),
            ]);
        } catch (Exception $e) {
            throw new Exception("Error initializing Google Analytics client: " . $e->getMessage());
        }
    }

    /**
     * Fetch the Google Analytics report.
     * 
     * @param string $propertyId
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getReport($propertyId, $startDate, $endDate)
{
    try {
        $dateRange = new DateRange();
        $dateRange->setStartDate($startDate);
        $dateRange->setEndDate($endDate);

        $siteMetrics = [
            new Metric(['name' => 'sessions']),
            new Metric(['name' => 'totalUsers']),
            new Metric(['name' => 'newUsers']),
        ];

        $pageMetrics = [
            new Metric(['name' => 'screenPageViews']),
        ];

        $browserDimensions = [
            new Dimension(['name' => 'browser']),
        ];

        $referrerDimensions = [
            new Dimension(['name' => 'pageReferrer']),
        ];

        $analyticsData = [
            'siteAnalytics' => [],
            'topPages' => [],
            'topBrowsers' => [],
            'topReferrers' => [],
            'activityLogs' => [],
            'requestErrors' => [],
        ];

        $siteAnalyticsResponse = $this->analytics->runReport([
            'property' => 'properties/' . $propertyId,
            'dateRanges' => [$dateRange],
            'dimensions' => [new Dimension(['name' => 'date'])],
            'metrics' => [
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'bounceRate']),
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'activeUsers']),
            ],
        ]);
        
        $analyticsData['siteAnalytics'] = [];
        
        foreach ($siteAnalyticsResponse->getRows() as $row) {
            $analyticsData['siteAnalytics'][] = [
                'date' => \Carbon\Carbon::createFromFormat('Ymd', $row->getDimensionValues()[0]->getValue())->format('Y-m-d'),
                'sessions' => $row->getMetricValues()[0]->getValue(), 
                'bouncerate' => number_format($row->getMetricValues()[1]->getValue() * 100, 2),
                'pageviews' => $row->getMetricValues()[2]->getValue(),
                'activeusers' => $row->getMetricValues()[3]->getValue(),
            ];
        }

        $topPagesResponse = $this->analytics->runReport([
            'property' => 'properties/' . $propertyId,
            'dateRanges' => [$dateRange],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'dimensions' => [new Dimension(['name' => 'pagePath'])],
        ]);
        
        $analyticsData['topPages'] = [];
        
        foreach ($topPagesResponse->getRows() as $index => $row) {
            if ($index >= 10) break;
            $analyticsData['topPages'][] = [
                'page' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => $row->getMetricValues()[0]->getValue(),
            ];
        }

        $topReferrersResponse = $this->analytics->runReport([
            'property' => 'properties/' . $propertyId,
            'dateRanges' => [$dateRange],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'dimensions' => [new Dimension(['name' => 'pageReferrer'])],
        ]);
        
        $rows = $topReferrersResponse->getRows();

        foreach ($rows as $index => $row) {
            if ($index >= 10) break;
        
            $referrer = $row->getDimensionValues()[0]->getValue();
            $sessions = $row->getMetricValues()[0]->getValue();
        
            $existingReferrer = array_search($referrer, array_column($analyticsData['topReferrers'], 'referrer'));
        
            if ($existingReferrer === false) {
                $analyticsData['topReferrers'][] = [
                    'referrer' => $referrer,
                    'sessions' => $sessions,
                ];
            }
        }

        $topBrowsersResponse = $this->analytics->runReport([
            'property' => 'properties/' . $propertyId,
            'dateRanges' => [$dateRange],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'dimensions' => $browserDimensions,
        ]);

        foreach ($topBrowsersResponse->getRows() as $index => $row) {
            if ($index >= 15) break;
            $analyticsData['topBrowsers'][] = [
                'browser' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => $row->getMetricValues()[0]->getValue(),
            ];
        }

        $topReferrersResponse = $this->analytics->runReport([
            'property' => 'properties/' . $propertyId,
            'dateRanges' => [$dateRange],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'dimensions' => $referrerDimensions,
        ]);

        foreach ($topReferrersResponse->getRows() as $index => $row) {
            if ($index >= 5) break;
            $analyticsData['topReferrers'][] = [
                'referrer' => $row->getDimensionValues()[0]->getValue(),
                'sessions' => $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $analyticsData;
    } catch (Exception $e) {
        throw new Exception("Error fetching Google Analytics report: " . $e->getMessage());
    }
}

}
