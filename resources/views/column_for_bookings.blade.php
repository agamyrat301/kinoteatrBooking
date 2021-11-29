
<a class="dropdown-toggle btn btn-primary three-dots" type="button" data-toggle="dropdown" style="color: #fff;"></a>

<div class="dropdown-menu dropdown-menu-right">
    {{-- <div class="dropdown-item">
        <form method="post" action="{{ route('bookings.destroy', $booking->id) }}" class="edit-delete" id="em-{{ $booking->id }}">
            @csrf
            @method('delete')

            <a href="#" class="btn btn-danger btn-sm btn-block" title="remove"
               onclick="if(confirm('Bu seansy çynnanam udalit etmekçimi?'))
                   { document.getElementById('em-{{ $booking->id }}').submit() }"
            ><i data-icon="remove"></i> Poz </a>
        </form>
    </div> --}}

    <div class="dropdown-item">
        <a href="{{ route('bookings.edit', $booking->id) }}"
           class="btn btn-primary btn-sm btn-block" title="edit"> <i data-icon="edit"></i> Üýtget </a>
    </div>

    <div class="dropdown-item">
        <a href="{{ route('bookings.show', $booking->id) }}"
           class="btn btn-primary btn-sm btn-block" title="show"> <i data-icon="eye"></i> Görkez </a>
    </div>

    {{-- <div class="dropdown-item">
        
        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalCenter">Yer Zanitla</button>
    </div> --}}

</div>
