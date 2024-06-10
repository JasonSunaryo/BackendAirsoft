<br>
<br>
<br>
<br>
<br>
     <section class="section product" id="product" aria-label="product">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Products</h2>

            <ul class="filter-btn-list">

              <li class="filter-btn-item">
                <button class="filter-btn active" data-filter-btn="all">All Products</button>
              </li>

              <li class="filter-btn-item">
                <button class="filter-btn" data-filter-btn="accessory">Handgun</button>
              </li>

              <li class="filter-btn-item">
                <button class="filter-btn" data-filter-btn="decoration">Shotgun</button>
              </li>

              <li class="filter-btn-item">
                <button class="filter-btn" data-filter-btn="furniture">Sniper</button>
              </li>

              
              <li class="filter-btn-item">
                <button class="filter-btn" data-filter-btn="decoration">Rifle</button>
              </li>

              <li class="filter-btn-item">
                <button class="filter-btn" data-filter-btn="furniture">SMG</button>
              </li>

            </ul>
          </div>

          <ul class="grid-list product-list" data-filter="all">

            @foreach($product as $product)
            <div class="product-card">
                <a href="#" class="card-banner img-holder has-before" style="--width: 300; --height: 300;">
                    <img  src="{{ Storage::url($product->image) }}"  loading="lazy"
                         alt="{{ $product->name }}" class="img-cover">
            
                    <ul class="card-action-list">
                        <li>
                            <button class="card-action-btn" aria-label="add to cart" title="add to cart">
                                <ion-icon name="add-outline" aria-hidden="true"></ion-icon>
                            </button>
                        </li>
                        <li>
                            <button class="card-action-btn" aria-label="add to cart" title="add to cart">
                                <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                            </button>
                        </li>
                        <li>
                            <button class="card-action-btn" aria-label="add to wishlist" title="add to wishlist">
                                <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                            </button>
                        </li>
                    </ul>
                    <ul class="badge-list">
                    </ul>
                </a>
                <div class="card-content">
                    <h3 class="h3">
                        <a href="#" class="card-title">{{ $product->title }}</a>
                    </h3>
                    <div class="card-price">
                        <span class="price">Rp {{ $product->price }}</span>
                       
                    </div>
                    <div class="stock-info">
                      <span class="stock">Stock: {{ $product->stock }}</span>
                  </div>
                </div>
            </div>
            @endforeach
            

        

          </ul>

        </div>
      </section>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  