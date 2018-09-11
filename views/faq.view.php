<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');

?>


<div class='container bg-light mt-5 pt-4 pb-5 w-75 rounded'>
            <h2>Frequently Asked Questions</h2>
            <hr/>
            <p>
            <span class="lead">Library Management System</span>
            is a web app which allows you to keep track of your books' collection. This app enables you to:
            </p>

            <ul class="list-group list-group-flush bg-light">
                <li class="list-group-item bg-light border border-0">Store your list of books without any limitation.</li>
                <li class="list-group-item bg-light">Search your list for a particular book by book name, author, genre, language, or your read status.</li>
                <li class="list-group-item bg-light">Filter your list by author, genre, language, or your read status.</li>
                <li class="list-group-item bg-light">Sort your list by author, genre, language, or your read status.</li>
            </ul>

            <br/><br/>
            <p>
            This app also shows you relevant information about the author of the book you entered in your collection.
            </p>
            <hr/>

            <dl>
                <dt>How do I filter books in my list?</dt>
                <dd>
                You can filter your list by simply typing a particular characteristic in the search/filter box.
                <br/>
                For example:
                <br/>
                To filter list by a particular author, type the author's name in the search box. All the books
                in your collection written by that particular author will be shown.
                <br/>
                Similary, do the same for filtering with genre, language and read status.            
                </dd>
                    <br/>
                <dt>How do I sort my list of books?</dt>
                <dd>
                    You can sort your list of book by clicking on the header of a column.
                    The list will be then sorted according to that specific column. 
                    <br/>
                    &#x25B2; arrow means that the list is sorted in the ascending order, whereas 
                    &#x25BC; arrow menas that the list is sorted in the descending order.
                </dd>
                    <br/>
                
                <dt>How do I view, edit and/or delete the data about a particular book?</dt>
                <dd>
                You can edit the data about a particular book by clicking on that book's name (as shown in your books' list).
                This will take you to that particular entry of your collection.
                From there, it is up to you to take whatever action you desire.
                </dd>
                    <br/>
                <dt>Why is the app showing differnet author name in author details than the one I've entered?</dt>
                <dd>
                That is because the author details show the author's name from GoodReads' database. This decision has been taken to ensure
                that the user should be aware about the correct (or more common variant) spelling of the author's name.
                <br/>
                This is also useful in case you forget the author's name and/or entered incorrect author name.
                </dd>
                <dt>Why is the app showing incorrect author details of a book I've entered?</dt>
                <dd>If the view page is showing incorrect author details, make sure that you've not misspelt the title of
                    the book.
                    <br/>
                    I use GoodReads API to present relevant information about your book. In order to see the
                    correct author details, make sure that the title of your book is same as that of GoodReads.
                </dd>
                    <br/>
                <dt>Why are the author details of one of my entered books not being shown?</dt>
                <dd>
                First of all, make sure that the title of the book has been entered correctly with proper spelling.
                <br>
                Secondly, although highly unlikely, it is possible that GoodReads may not contain any information about that particular author.
                In that case, you should consider contributing information about that author on GoodReads. Not only will it help GoodReads' users,
                it will also enable apps like Library Management System provide services to you.
                </dd>
                    <br/>
                <dt>What is your privacy policy?</dt>
                <dd>
                No personal or identifying information is stored on the server. Library Management System uses cookies to provide you
                customized service. The data, except for the book name to obtain author's details from GoodReads, is not shared with any third-party whatsoever.
                All user accounts' passwords are hashed and stored securely.
                </dd>
            </dl>
</div>

<?php 

require('core/scripts/necessary-scripts.php');
require('views/partials/footer.partialview.php'); 

?>