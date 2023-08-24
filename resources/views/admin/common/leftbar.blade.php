  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

      <div data-simplebar class="h-100">

          <!-- User details -->
          <div class="user-profile text-center mt-3">

              <div class="mt-3">
                  <h4 class="font-size-16 mb-1">{{Session::get('user')->name}}</h4>
              </div>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title">Menu</li>

                
                  <li>
                      <a href="{{route('dashboard')}}" class="waves-effect">
                          <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  @if(Session::get('user')->id==1)
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-dashboard-line"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub-menu">
                          <li><a href="{{route('view-add-user')}}">Create User</a></li>
                          <li><a href="{{route('view-user')}}">View User</a></li>
                      </ul>
                  </li>
                 
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-dashboard-line"></i>
                          <span>Category</span>
                      </a>
                      <ul class="sub-menu">
                          <li><a href="{{route('view-add-category')}}">Create Category</a></li>
                          <li><a href="{{route('view-category')}}">View Category</a></li>
                      </ul>
                  </li>
                
                 <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-dashboard-line"></i>
                          <span>Sub Category</span>
                      </a>
                      <ul class="sub-menu">
                          <li><a href="{{route('view-add-subcategory')}}">Create Sub Category</a></li>
                          <li><a href="{{route('view-subcategory')}}">View Sub Category</a></li>
                      </ul>
                  </li>
                  @endif

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-dashboard-line"></i>
                          <span>Kyc</span>
                      </a>
                      <ul class="sub-menu">
                          <li><a href="{{route('view-add-kyc')}}">Create Kyc</a></li>
                          <li><a href="{{route('view-kyc')}}">View Kyc</a></li>
                      </ul>
                  </li>

              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
  <!-- Left Sidebar End -->