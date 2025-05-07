

<div class="menu-container position-fixed bottom-0 ">
    <div class="menu-button text-white bg-blu" id="menuToggle"><i class="bi bi-translate"></i></div>
    <div class="menu-items gap-0" id="menuItems">
        <x-_locale lang="it"/>
        <x-_locale lang="en"/>
        <x-_locale lang="fr"/>
    </div>
</div>

<script>
    document.getElementById('menuToggle').addEventListener('click', function () {
        let menu = document.getElementById('menuItems');
        menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'flex' : 'none';
    });
</script>

