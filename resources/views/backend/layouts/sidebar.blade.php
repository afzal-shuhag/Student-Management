@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    @if(Auth::user()->role_two == 'Admin')
    <li class="nav-item {{ ($prefix == '/users') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          User Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('users.view') }}" class="nav-link {{ ($route == 'users.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View User</p>
          </a>
        </li>

      </ul>
    </li>
    @endif

    <li class="nav-item {{ ($prefix == '/profiles') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Profile Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route == 'profiles.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Your Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route == 'profiles.password.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Change Password</p>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/setups') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Setup Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('setups.student.class.view') }}" class="nav-link {{ ($route == 'setups.student.class.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Class</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.year.view') }}" class="nav-link {{ ($route == 'setups.student.year.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Year</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.group.view') }}" class="nav-link {{ ($route == 'setups.student.group.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Group</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.shift.view') }}" class="nav-link {{ ($route == 'setups.student.shift.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Shift</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.fee.view') }}" class="nav-link {{ ($route == 'setups.student.fee.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Fee Category</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.amount.view') }}" class="nav-link {{ ($route == 'setups.student.amount.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Fee Amount</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.exam.type.view') }}" class="nav-link {{ ($route == 'setups.student.exam.type.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Exam Type</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.subject.view') }}" class="nav-link {{ ($route == 'setups.student.subject.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Subject</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.assign.subject.view') }}" class="nav-link {{ ($route == 'setups.student.assign.subject.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Assign Subject</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setups.student.designation.view') }}" class="nav-link {{ ($route == 'setups.designation.subject.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Designation</p>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/students') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Student Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('students.registration.view') }}" class="nav-link {{ ($route == 'students.registration.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Registration</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('students.roll.view') }}" class="nav-link {{ ($route == 'students.roll.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Roll Generate</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('students.reg.fee.view') }}" class="nav-link {{ ($route == 'students.reg.fee.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Registration Fee</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('students.monthly.fee.view') }}" class="nav-link {{ ($route == 'students.monthly.fee.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Monthly Fee</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('students.exam.fee.view') }}" class="nav-link {{ ($route == 'students.exam.fee.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Exam Fee</p>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/employee') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Employee Management
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('employee.registration.view') }}" class="nav-link {{ ($route == 'employee.registration.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Registration</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('employee.salary.view') }}" class="nav-link {{ ($route == 'employee.salary.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Salary</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('employee.leave.view') }}" class="nav-link {{ ($route == 'employee.leave.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Leave</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('employee.attendance.view') }}" class="nav-link {{ ($route == 'employee.attendance.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Attendance</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('employee.monthly.salary.view') }}" class="nav-link {{ ($route == 'employee.monthly.salary.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Monthly Salary</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/marks') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Marks Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('marks.add') }}" class="nav-link {{ ($route == 'marks.add') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Marks Entry</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('marks.edit') }}" class="nav-link {{ ($route == 'marks.edit') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Marks Edit</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('marks.grade.view') }}" class="nav-link {{ ($route == 'marks.grade.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Grade Point</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/account') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Account Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('account.fee.view') }}" class="nav-link {{ ($route == 'account.fee.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student fee</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('account.salary.view') }}" class="nav-link {{ ($route == 'account.salary.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee Salary</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('account.cost.view') }}" class="nav-link {{ ($route == 'account.cost.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Others Cost</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/reports') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Reports Management
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('reports.profit.view') }}" class="nav-link {{ ($route == 'reports.profit.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Monthly Profit</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reports.marksheet.view') }}" class="nav-link {{ ($route == 'reports.marksheet.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Student Marksheet</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reports.attendance.view') }}" class="nav-link {{ ($route == 'reports.attendance.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Attendance Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('reports.result.view') }}" class="nav-link {{ ($route == 'reports.result.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Students Result</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
