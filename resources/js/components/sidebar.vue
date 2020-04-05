
<template>
   <div class="sidebar" role="navigation">

    <div id="navSidebar" class="nav-sidebar">
        <ul  id="side-nav-menu" class="nav">
            <li class="nav-item">
                <a
                    class="nav-link dashboard admin"
                    href="http://localhost/tastyigniter/admin/dashboard"
                    aria-expanded="false"
                >
                <i class="fas fa-tachometer-alt fa-fw"></i>
                    <span class="content">Dashboard</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed py-1 restaurant has-arrow" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1" ><i class="fas fa-store fa-fw"></i>
                    <span class="content">Restaurant</span>
                </a></a>
                <div class="collapse" id="submenu1sub1" aria-expanded="false">
                    <ul class="flex-column nav pl-4">
                        <li class="nav-item">
                            <a href="/admin/location" class="nav-link p-1" >
                                Locations
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed py-1 restaurant has-arrow" href="#submenu1sub2" data-toggle="collapse" data-target="#submenu1sub2" ><i class="fas fa-utensils fa-fw"></i>
                    <span class="content">Kitchen</span>
                </a></a>
                <div class="collapse" id="submenu1sub2" aria-expanded="false">
                    <ul class="flex-column nav pl-4">
                        <li class="nav-item">
                            <a href="/admin/categories" class="nav-link p-1" >
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/mealtime" class="nav-link p-1" >
                                Mealtime
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
            <li class="nav-item">
                <a class="nav-link collapsed py-1 restaurant has-arrow" href="#submenu1sub2" data-toggle="collapse" data-target="#submenu1sub3" ><i class="fas fa-globe"></i>
                    <span class="content"> Localisation</span>
                </a></a>
                <div class="collapse" id="submenu1sub3" aria-expanded="false">
                    <ul class="flex-column nav pl-4">
                        <li class="nav-item">
                            <a href="/admin/countries" class="nav-link p-1" >
                                Countries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/currencies" class="nav-link p-1" >
                                Currencies
                            </a>
                        </li>
                    </ul>
                </div>
            </li>         
        </ul>
    </div>
</div>
</template>

