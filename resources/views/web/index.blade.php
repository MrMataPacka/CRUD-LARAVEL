@extends('layout.layoutIndex')
@section('content')

<div class="products-carrousel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="https://usa.1more.com/cdn/shop/files/Banner_11_72e954ed-759b-4102-97aa-0346566f1a55.webp?v=1706777666&width=3000" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="https://usa.1more.com/cdn/shop/files/Pancake_Love_2.jpg?v=1748499019&width=3000" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="https://usa.1more.com/cdn/shop/files/1MORE_SonoFlow_Pro_Wireless_ANC_Over-Ear_Headphones_1.webp?v=1726052522&width=3000" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>

<div class="contact-us-form">
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>Tabasco</option>
            </select>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
</div>

<div class="product-carts">
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="https://usa.1more.com/cdn/shop/files/SonoFlowProHQ51-Black_3.webp?v=1724921478&width=650" alt="Card image cap">
        <div class="card-body">

            <p class="card-text">HEADPHONES</p>
            <h5 class="card-title">$1,000</h5>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>

@endsection
