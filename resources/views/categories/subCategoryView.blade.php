@foreach($subcategories as $subcategory)
        <tr data-id="{{$subcategory->id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
            {{-- <span>-</span> --}}
            <td data-column="name">{{$subcategory->name}}</td>
        </tr>
        @if(count($subcategory->subcategory))
            @include('categories.subCategoryView',['subcategories' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel ])
        @endif
@endforeach

<script>

</script>