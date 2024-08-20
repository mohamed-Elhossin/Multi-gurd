  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('admin.home') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item">
              <a class="nav-link "
                  href="{{ route('project.index') }}">
                  <i class="bi bi-menu-button-wide"></i><span>Projects</span>
              </a>

          </li><!-- End Components Nav -->

          <li class="nav-item">
            <a class="nav-link "
                href="{{ route('task.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Tasks</span>
            </a>

        </li><!-- End Components Nav -->



          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('admin.faq') }}">
                  <i class="bi bi-question-circle"></i>
                  <span>F.A.Q</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('admin.contact') }}">
                  <i class="bi bi-envelope"></i>
                  <span>Contact</span>
              </a>
          </li><!-- End Contact Page Nav -->




      </ul>

  </aside><!-- End Sidebar-->
