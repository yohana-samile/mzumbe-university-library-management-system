<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent p-0 justify-content-end">
        <li class="breadcrumb-item text-capitalize"><a href="{{ url('home') }}">Dashboard</a></li>
        @php
            $segments = explode('/', request()->path());
            $breadcrumbUrl = '';
        @endphp

        @foreach ($segments as $segment)
            @php
                $breadcrumbUrl .= '/' . $segment;
            @endphp
            @if ($loop->last)
                <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ ucfirst(str_replace('-', ' ', $segment)) }}</li>
            @else
                <li class="breadcrumb-item text-capitalize"><a href="{{ url($breadcrumbUrl) }}">{{ ucfirst(str_replace('-', ' ', $segment)) }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
