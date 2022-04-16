<div class="row g-0" style="width: 100%;height:100%">
    
    
    
    @foreach ($category as $item)
    <div style="" class="mt-2 col-6 col-md-2 d-flex flex-wrap align-items-around mb-3">
        <div class="p-1" style="width:100%;height:64%"> 
            <img style="max-height: 100%" src="images/wine_image/{{$item['image']}}" />
        </div>
        <div class="d-flex justify-content-center flex-wrap winde-det" style="width:100%;height:26%">
            <span class="w-100 d-flex justify-content-center">{{$item['name']}}</span>
            <span class="w-100 d-flex justify-content-center">{{$item['price']}}</span>
            <div class="d-flex justify-content-center w-100"><div class="d-flex justify-content-center q-btn">{{$item['quantity']}}</div>
            <button style="margin-left:10px" class="add-cart-btn d-flex align-items-center">
                <i class="fas fa-shopping-cart "></i><span>Add</span>
            </button>
        </div>
        </div>
    </div>
        
    @endforeach
    
</div>