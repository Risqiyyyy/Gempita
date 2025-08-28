<style>
    .search-bar {
        margin-bottom: 20px;
    }

    .search-bar input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
<div class="search-bar">
    <input type="text" id="search" placeholder="Cari berkas..." />
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll('.file-item'); // Ganti dengan selector yang sesuai

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query)) {
                item.style.display = ''; // Tampilkan item
            } else {
                item.style.display = 'none'; // Sembunyikan item
            }
        });
    });
</script>
