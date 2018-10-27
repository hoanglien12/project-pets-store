    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </li>
        <li>
            <a href="{{ route('product_category.show') }}"><i class="fa fa-dashboard fa-fw"></i> Product Category</a>
        </li>
        <li>
            <a href="{{ route('product.show') }}"><i class="fa fa-dashboard fa-fw"></i> Products</a>
        </li>
        <li>
            <a href="{{ route('dog_category.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dog Category</a>
        </li>
        <li>
            <a href="{{ route('dog.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dogs</a>
        </li>
        <li>
            <a href="{{ route('order.index') }}"><i class="fa fa-dashboard fa-fw"></i> Orders</a>
        </li>
        <li>
            <a href="{{ route('post.index') }}"><i class="fa fa-dashboard fa-fw"></i> Posts</a>
        </li>
    </ul>
