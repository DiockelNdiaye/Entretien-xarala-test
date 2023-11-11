<!DOCTYPE html>
<html lang="en">
    @include('includes.head')
<body>
    <div class="dashboard-container">
        @include('includes.sideBar')
        <main class="main-container">
        <!-- Mon contenu -->
        @yield('content')
        <!--Fin Mon contenu -->
        </main>
    </div>
</body>
</html>