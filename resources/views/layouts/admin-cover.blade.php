<div id="admin-app-cover">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>

<script>
    function fadeOutEffect() {
        let adminApp = document.getElementById('admin-app');
        let fadeTarget = document.getElementById('admin-app-cover');
        let fadeEffect = setInterval(function () {
            if (!fadeTarget.style.opacity) {
                fadeTarget.style.opacity = 1;
            }
            if (fadeTarget.style.opacity > 0) {
                fadeTarget.style.opacity -= 0.1;
                fadeTarget.style = 'display:none';
                adminApp.style = 'display:flex';
            } else {
                clearInterval(fadeEffect);
            }
        }, 10);
    }

    document.addEventListener("DOMContentLoaded", fadeOutEffect);
</script>
