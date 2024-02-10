<div class="dropdown">
    {{-- <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
      Dropdown link
    </a> --}}
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"  class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
        <g clip-path="url(#clip0_30_473)">
        <path d="M6 10C4.9 10 4 10.9 4 12C4 13.1 4.9 14 6 14C7.1 14 8 13.1 8 12C8 10.9 7.1 10 6 10ZM18 10C16.9 10 16 10.9 16 12C16 13.1 16.9 14 18 14C19.1 14 20 13.1 20 12C20 10.9 19.1 10 18 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="#313957"/>
        </g>
        <defs>
        <clipPath id="clip0_30_473">
        <rect width="24" height="24" fill="white"/>
        </clipPath>
        </defs>
        </svg>  
    <ul class="dropdown-menu">
      <li><a class="dropdown-item conva-edit" href="#" data-id="{{ $data->id_member }}">Edit</a></li>
      <li><a class="dropdown-item delete-data" href="#" data-id="{{ $data->id_member }}">Delete</a></li>
    </ul>
  </div>