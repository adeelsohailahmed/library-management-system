    <body>
        <nav class="navbar navbar-dark navbar-expand-lg py-1">
            <div class="dropdown show">
                    <a class="navbar-brand text-light dropdown-toggle" href="#" data-toggle="dropdown">
                        Hello, <?= $_SESSION["user_name"] ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout">Logout</a>
                    </div>
                </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
                <ul class="navbar nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLinkListing" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Lists
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkListing">
                            <a class="dropdown-item" href="book-listing">Books' Listing</a>
                            <a class="dropdown-item" href="issued-books-listing">Issued Books' Listing</a>
                            <a class="dropdown-item" href="members-listing">Members' Listing</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLinkAddNew" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add New
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkAddNew">
                            <a class="dropdown-item" href="add-book">Add New Book</a>
                            <a class="dropdown-item" href="add-member">Add New Member</a>
                        </div>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link text-light" href="issue-receive-book">Issue / Receive Book</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link text-light" href="about">About</a>
                    </li>
                </ul>
            </div>
        </nav>