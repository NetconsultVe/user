<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU DE OPERACIONES</li>
    <li class=""><a href="home"><i class="fa fa-home"></i><span class="fontMenu">RESUMEN</span></a></li>
    @if(Auth::user()->id_nivel == 4 || Auth::user()->id_nivel == 1)
    <li class=""><a href="ubch"><i class="fa fa-address-card"></i><span class="fontMenu">UBCH Y RESPONSABLE</span></a></li>
    @endif
    @if(Auth::user()->id_nivel == 3 || Auth::user()->id_nivel == 1)
    <li class=""><a href="comunidad"><i class="fa fa-sitemap"></i><span class="fontMenu">COMUNIDAD Y RESPONSABLE</span></a></li>
    @endif
    <li class=""><a href="calle"><i class="fa fa-users"></i><span class="fontMenu">CALLE Y RESPONSABLE</span></a></li>
    @if(Auth::user()->id_nivel == 5 || Auth::user()->id_nivel == 1)
    <li class=""><a href="familia"><i class="fa fa-group"></i><span class="fontMenu">FAMILIA Y JEFE DE FAMILIA</span></a></li>
    @endif
    <li style="opacity:0; display='none'><a href="" id="aCod_mun">{{ Auth::user()->cod_mp }}</a></li>
    <li style="opacity:0; display='none'"><a href="" id="aCod_pq">{{ Auth::user()->cod_pq }}</a></li>
    <li style="opacity:0; display='none'"><a href="" id="aCod_cm">{{ Auth::user()->cod_ubch }}</a></li>
    <li style="opacity:0; display='none'"><a href="" id="aCod_cman">{{ Auth::user()->cod_comun }}</a></li>
    <li style="opacity:0; display='none'"><a href="" id="aCod_calle">{{ Auth::user()->cod_manzana }}</a></li>
</ul>