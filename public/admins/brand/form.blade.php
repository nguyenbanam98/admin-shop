<div class="form-group">
    <label for="brand">Ten danh muc</label>
    <input type="text" class="form-control" name="name" value="{{old('brand', $brand->name ?? '')}}" id="brand" placeholder="Nhap ten danh muc">
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">Mo ta</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description', $brand->description ?? '')}}</textarea>
</div>

