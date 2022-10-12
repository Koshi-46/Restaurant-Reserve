<nav x-data="{ open: false }">
    <button type="button" class="menu-btn" x-on:click="open=!open">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <div class="menu" x-bind:class="{'is-active' : open }">
        <div class="menu__item">TOP</div>
        <div class="menu__item">ABOUT</div>
        <div class="menu__item">BLOG</div>
        <div class="menu__item">CONTACT</div>
    </div>
</nav>