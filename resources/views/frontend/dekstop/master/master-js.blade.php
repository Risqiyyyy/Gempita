<script src="{{ asset('frontend/js/sticky-sidebar.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    const loadmore = document.querySelector('#loadmore');
    let currentItems = 5;
    loadmore.addEventListener('click', (e) => {
        const elementList = [...document.querySelectorAll('.list .list-element')];
        for (let i = currentItems; i < currentItems + 5; i++) {
            if (elementList[i]) {
                elementList[i].style.display = 'block';
            }
        }
        currentItems += 5;
        // Load more button will be hidden after list fully loaded
        if (currentItems >= elementList.length) {
            event.target.style.display = 'none';
        }
    })
</script>

<script>
    document.getElementById("search-button").addEventListener("click", function() {
        document.getElementById("search-form").classList.toggle("hidden");
    });
</script>

<script>
    $(document).ready(function() {
        if ($("#sticky-sidebar").length > 0) {
            $("#sticky-sidebar").stickySidebar({
                containerSelector: "#content",
                innerWrapperSelector: ".sidebar__inner",
                topSpacing: 75,
                bottomSpacing: 10,
            });
        }
    });
</script>

<script>
    document.addEventListener('copy', function(e) {
        var selection = document.getSelection();
        if (selection.rangeCount > 0) {
            var range = selection.getRangeAt(0);
            var copyText = selection.toString();
            var source = '\n\nSumber dari Gempita Milenial: ' + window.location.href;
            e.clipboardData.setData('text/plain', copyText + source);
            e.preventDefault();
        }
    });
</script>
