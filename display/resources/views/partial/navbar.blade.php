@if (empty($isPdf))
<style>
.sidebar {position: fixed;top: 0;left: -250px;width: 250px;height: 100%;background-color: #efefef;box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);padding: 20px;display: flex;flex-direction: column;justify-content: space-between;transition: all 0.3s ease-in-out;z-index: 1000;overflow-y: auto;}.sidebar-logo {display: flex;justify-content: center;align-items: center;margin-bottom: 20px;}.sidebar-logo img {width: 150px;height: auto;}.sidebar ul {list-style: none;padding: 0;margin: 0;flex-grow: 1;}.sidebar ul li {margin: 15px 0;}.sidebar ul li a {    text-decoration: none;    color: black;    font-size: 18px;    display: block;    padding: 10px 15px;    border-radius: 5px;    transition: background-color 0.3s ease;}.sidebar ul li a:hover {background-color: #7b1e1e;color: white;}.sidebar .logout {margin-top: auto;display: block;padding: 10px 15px;text-align: center;background-color: #dc3545;color: white;font-size: 18px;border-radius: 5px;transition: background-color 0.3s ease;text-decoration: none;}.sidebar .logout:hover {background-color: #ef7783;}.overlay {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.5);z-index: 999;display: none;}.sidebar.active {left: 0;}.overlay.active {display: block;}.close-sidebar-button {position: fixed;top: 50%;left: 0; /* Start from left edge when hidden */transform: translateY(-50%);width: 50px;height: 50px;border-radius: 50%;background-color: #992424;color: white;border: none;z-index: 1050;font-size: 24px;display: flex;justify-content: center;align-items: center;box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);cursor: pointer;transition: all 0.3s ease-in-out; /* Match the sidebar transition */opacity: 0;visibility: hidden;}.sidebar.active + .close-sidebar-button,.sidebar.active ~ .close-sidebar-button {left: 220px;opacity: 1;visibility: visible;}.close-sidebar-button:hover {background-color: #54040c;}

.scroll-to-top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #a12828;
  color: #d3d3d3;
  border: none;
  outline: none;
  cursor: pointer;
  z-index: 999;
  transition: background-color 0.3s, transform 0.3s;
}

.scroll-to-top i {
  font-size: 20px;
  line-height: 50px;
}

.scroll-to-top:hover {
  background-color: #f3acac;
  transform: translateY(-5px);
}

.scroll-to-top:active {
  transform: translateY(0);
}
</style>
<nav class="bg-[#992424]">
  <div class="container mx-auto px-4 py-2 flex items-center justify-between">
    <!-- Sidebar Toggle -->
    <div class="flex items-center">
      <button class="btn-outline-light mr-5 border-2 p-2" id="sidebarToggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" stroke="currentColor" stroke-width="1.5">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
        </svg>
      </button>
      <a class="navbar-brand flex items-center" href="#">
        <img src="{{ asset('img/Logo (3295x1171).png') }}" class="w-48 h-auto">
      </a>
    </div>
    
    <!-- Toggler Button -->
    <button class="lg:hidden" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto flex space-x-4">
        @guest
          <li class="nav-item active text-dark font-bold">
            AKTI | Learning
          </li>
        @else
          <li class="nav-item">
            Welcome
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<div>
  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
      <a href="#">
        <img src="{{ asset('img/Logo (3295x1171).png') }}" alt="Logo" class="cursor-pointer" onclick='sidebar.classList.remove("active");overlay.classList.remove("active");'>
      </a>
    </div>
    <hr class="border-t-2 my-4">
    <ul>
      @guest
        <li><a href="#" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
              <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4q0 1 .25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75Q6 13 6 12H2s-2 0-2-2zm1.398-.855a.76.76 0 0 0-.254.302A1.5 1.5 0 0 0 1 4.01V10c0 .325.078.502.145.602q.105.156.302.254a1.5 1.5 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.76.76 0 0 0 .254-.302 1.5 1.5 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.76.76 0 0 0-.302-.254A1.5 1.5 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145"/>
            </svg> 
            <span>Display</span>
        </a></li>
        <li><a href="#" class="flex items-center space-x-2  hover:bg-gray-700 p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
            </svg> 
            <span>Masuk</span>
        </a></li>
      @else
        <li><a href="{{ route('admin.home') }}" class="flex items-center space-x-2  hover:bg-gray-700 p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
              <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
            </svg> 
            <span>Home</span>
        </a></li>

        <li><a href="#" class="flex items-center space-x-2  hover:bg-gray-700 p-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.02-.528z"/>
            </svg> 
            <span>Dashboard</span>
        </a></li>
      @endguest
    </ul>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    // Toggle sidebar visibility
    sidebarToggle.addEventListener("click", function () {
      sidebar.classList.toggle("active");
      overlay.classList.toggle("active");
    });

    // Hide sidebar when overlay is clicked
    overlay.addEventListener("click", function () {
      sidebar.classList.remove("active");
      overlay.classList.remove("active");
    });
  });

    //Scroll to top
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        scrollToTopBtn.style.display = 'block';
      } else {
        scrollToTopBtn.style.display = 'none';
      }
    });

    scrollToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
</script>

@endif
