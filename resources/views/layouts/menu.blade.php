<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{{ route('students.index') }}"><i class="fa fa-edit"></i><span>Students</span></a>
</li>

<li class="{{ Request::is('sessions*') ? 'active' : '' }}">
    <a href="{{ route('sessions.index') }}"><i class="fa fa-edit"></i><span>Sessions</span></a>
</li>

<li class="{{ Request::is('grades*') ? 'active' : '' }}">
    <a href="{{ route('grades.index') }}"><i class="fa fa-edit"></i><span>Grades</span></a>
</li>

<li class="{{ Request::is('batches*') ? 'active' : '' }}">
    <a href="{{ route('batches.index') }}"><i class="fa fa-edit"></i><span>Batches</span></a>
</li>

