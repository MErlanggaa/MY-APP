<hr class="sidebar-divider d-none d-md-block">
<div class ="sidebar-heading"> Data</div>
<li class="nav-item @if (isset($active) && $active == 'Supplier'){{ 'active' }}@endif">
    <a class="nav-link" href="{{ url('supplier') }}">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f7f7f7}</style><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
            <!-- your SVG content -->
        </svg>
        <span>Supplier</span>
    </a>
</li>
<li class="nav-item @if (isset($active) && $active == 'Barang'){{ 'active' }}@endif">
    <a class="nav-link" href="{{ url('barang') }}">
        <i class="fas fa-fw fa-cube"></i>
        <span>Barang</span>
    </a>
</li></a>




