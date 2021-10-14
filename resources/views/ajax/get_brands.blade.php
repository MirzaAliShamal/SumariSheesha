@foreach ($brands as $brand)
    <tr class="bg-dark text-white">
        <td class="text-center">{{ $loop->iteration }}</td>
        <td width="70%">{{ $brand->name }}</td>
        <td>
            <a href="{{ route('get.brands.products',$brand->id) }}" class="btn btn-success">View Products</a>
        </td>
    </tr>
@endforeach
