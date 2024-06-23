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
                    <button class="filter-btn active" data-filter="all">All Products</button>
                </li>
                <li class="filter-btn-item">
                    <button class="filter-btn" data-filter="Handgun">Handgun</button>
                </li>
                <li class="filter-btn-item">
                    <button class="filter-btn" data-filter="Shotgun">Shotgun</button>
                </li>
                <li class="filter-btn-item">
                    <button class="filter-btn" data-filter="Sniper">Sniper</button>
                </li>
                <li class="filter-btn-item">
                    <button class="filter-btn" data-filter="Rifle">Rifle</button>
                </li>
                <li class="filter-btn-item">
                    <button class="filter-btn" data-filter="SMG">SMG</button>
                </li>
            </ul>
  
            <div class="sort-wrapper">
                <label for="sort">Sort by: </label>
                <select id="sort">
                    <option value="default">Default</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="title-asc">Title: A-Z</option>
                    <option value="title-desc">Title: Z-A</option>
                </select>
            </div>
  
            <div class="search-wrapper">
                <label for="search">Search: </label>
                <input type="text" id="search" placeholder="Search products...">
            </div>
        </div>
  
        <ul class="grid-list product-list" data-filter="all">
            @foreach($products as $product)
            <div class="product-card" data-type="{{ $product->type }}" data-price="{{ $product->price }}" data-title="{{ $product->title }}">
                <a href="#" class="card-banner img-holder has-before" style="--width: 300; --height: 300;">
                    <img src="{{ Storage::url($product->image) }}" loading="lazy" alt="{{ $product->name }}" class="img-cover">
  
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
  
  @guest
  <div class="comment-container">
    <div class="container2">
        <h3>Comments</h3>
        <div class="comment-section">
            <div class="comments">
              @foreach($comments as $comment)
              <div class="comment">
                  <p class="comment-author">{{ $comment->user->name }}</p>
                  <p class="comment-text">{{ $comment->comment }}</p>
                  <p class="comment-date">{{ $comment->created_at->format('F d, Y') }}</p>
              </div>
              @endforeach
            </div>
        </div>
    </div>
  </div>
  @endguest
  
  @auth
  <div class="comment-container">
    <div class="container2">
        <h3>Comments</h3>
        <div class="comment-section">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <textarea name="comment" placeholder="Write your comment here..." required style="height: 80px; width: 100%;"></textarea>
                <button type="submit">Post Comment</button>
            </form>
            <div class="comments">
              @foreach($comments as $comment)
              <div class="comment">
                  <p class="comment-author">{{ $comment->user->name }}</p>
                  <p class="comment-text">{{ $comment->comment }}</p>
                  <p class="comment-date">{{ $comment->created_at->format('F d, Y') }}</p>
                  @can('update', $comment)
                  <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                  @endcan
                  @can('delete', $comment)
                  <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit">Delete</button>
                  </form>
                  @endcan
              </div>
              @endforeach
            </div>
        </div>
    </div>
  </div>
  @endauth
  
  <!-- ionicon link -->
  <script type="module">
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    const sortSelect = document.getElementById('sort');
    const searchInput = document.getElementById('search');
  
    filterButtons.forEach(button => {
      button.addEventListener('click', () => {
        const filterValue = button.getAttribute('data-filter');
  
        // Remove 'active' class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Add 'active' class to the clicked button
        button.classList.add('active');
  
        // Show/hide product cards based on filter
        filterProducts(filterValue, searchInput.value);
      });
    });
  
    sortSelect.addEventListener('change', () => {
      const sortValue = sortSelect.value;
      sortProducts(sortValue);
    });
  
    searchInput.addEventListener('input', () => {
      const filterValue = document.querySelector('.filter-btn.active').getAttribute('data-filter');
      filterProducts(filterValue, searchInput.value);
    });
  
    function filterProducts(filterValue, searchValue) {
      searchValue = searchValue.toLowerCase();
      productCards.forEach(card => {
        const cardType = card.getAttribute('data-type');
        const cardTitle = card.getAttribute('data-title').toLowerCase();
        if ((filterValue === 'all' || cardType === filterValue) && cardTitle.includes(searchValue)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }
  
    function sortProducts(sortValue) {
      const productList = document.querySelector('.grid-list');
      const sortedProducts = [...productCards];
  
      if (sortValue === 'price-asc') {
        sortedProducts.sort((a, b) => parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute('data-price')));
      } else if (sortValue === 'price-desc') {
        sortedProducts.sort((a, b) => parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute('data-price')));
      } else if (sortValue === 'title-asc') {
        sortedProducts.sort((a, b) => a.getAttribute('data-title').localeCompare(b.getAttribute('data-title')));
      } else if (sortValue === 'title-desc') {
        sortedProducts.sort((a, b) => b.getAttribute('data-title').localeCompare(a.getAttribute('data-title')));
      } else {
        sortedProducts.sort((a, b) => a.dataset.index - b.dataset.index); // Assuming dataset.index holds the original order index
      }
  
      productList.innerHTML = '';
      sortedProducts.forEach(card => productList.appendChild(card));
    }
  </script>
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>