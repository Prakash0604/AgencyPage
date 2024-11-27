<!-- plugins:js -->
<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
{{-- Chart js --}}

{{-- Chart js --}}
<script src="{{ asset('admin/js/template.js') }}"></script>
<!-- DataTables JS -->
<!-- Summernote JS -->


{{-- Select 2 --}}

 @isset($extraJs)
    @foreach ($extraJs as $js)
        <script src="{{ $js }}"></script>

    @endforeach
@endisset


@php
    $path = Request::path();
    $dir_path = public_path() . '/js/' . $path;
    if (is_dir($dir_path)) {
        $directory = new DirectoryIterator($dir_path);
        // Loop runs while directory is valid
        while ($directory->valid()) {
            if (!$directory->isDir()) {
                $filename = url('js/' . $path . '/' . $directory->getFilename());
                echo '<script src="' . $filename . '?v=0.3.1"></script>';
            }
            // Move to the next element
            $directory->next();
            // dd($directory->next());
        }
    }
@endphp
{{-- @stack('scripts') --}}

