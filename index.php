<?php include("partials/header.php"); ?>   




<body>
<div class="row columns">
    <img src="http://placehold.it/1200x400">
  </div>
  <div class="row">
    <!-- new post -->
    <div class="large-8  medium-8 columns ">
      <div class ="bottom-line center margin-menu-btm">
       <h4>New Post</h4>
     </div>
   </div>
   <!-- end new post -->

   <!-- side bar -->
   <div class="large-4  medium-4 columns">
    <div class ="bottom-line center margin-menu-btm">
     <h4>Popular Posts</h4>
   </div>
   <div class="row column section-margin-top">

    <div class="media-object">
      <div class="media-object-section">
        <img class="thumbnail" src="http://placehold.it/100">
      </div>
      <div class="media-object-section">
        <h5>All I need is a space suit and I'm ready to go.</h5>
      </div>
    </div>
    <div class="media-object">
      <div class="media-object-section">
        <img class="thumbnail" src="http://placehold.it/100">
      </div>
      <div class="media-object-section">
        <h5>Are the stars out tonight? I don't know if it's cloudy or bright.</h5>
      </div>
    </div>
    <div class="media-object">
      <div class="media-object-section">
        <img class="thumbnail" src="http://placehold.it/100">
      </div>
      <div class="media-object-section">
        <h5>And the world keeps spinning.</h5>
      </div>
    </div>
    <div class="media-object">
      <div class="media-object-section">
        <img class="thumbnail" src="http://placehold.it/100">
      </div>
      <div class="media-object-section">
        <h5>Cold hearted orb that rules the night.</h5>
      </div>
    </div>
  </div>
</div>

<!-- end side bar -->

</div><!-- end row -->



<div class="row">
  <div class="large-8 medium-8 columns">
    <h5>Here&rsquo;s your basic grid:</h5>
    <!-- Grid Example -->

    <div class="row">
      <div class="large-12 columns">
        <div class="primary callout">
          <p><strong>This is a twelve column section in a row.</strong> Each of these includes a div.callout element so you can see where the columns are - it's not required at all for the grid.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-6 medium-6 columns">
        <div class="primary callout">
          <p>Six columns</p>
        </div>
      </div>
      <div class="large-6 medium-6 columns">
        <div class="primary callout">
          <p>Six columns</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-4 medium-4 small-4 columns">
        <div class="primary callout">
          <p>Four columns</p>
        </div>
      </div>
      <div class="large-4 medium-4 small-4 columns">
        <div class="primary callout">
          <p>Four columns</p>
        </div>
      </div>
      <div class="large-4 medium-4 small-4 columns">
        <div class="primary callout">
          <p>Four columns</p>
        </div>
      </div>
    </div>

    <hr />

    <h5>We bet you&rsquo;ll need a form somewhere:</h5>
    <form>
      <div class="row">
        <div class="large-12 columns">
          <label>Input Label</label>
          <input type="text" placeholder="large-12.columns" />
        </div>
      </div>
      <div class="row">
        <div class="large-4 medium-4 columns">
          <label>Input Label</label>
          <input type="text" placeholder="large-4.columns" />
        </div>
        <div class="large-4 medium-4 columns">
          <label>Input Label</label>
          <input type="text" placeholder="large-4.columns" />
        </div>
        <div class="large-4 medium-4 columns">
          <div class="row collapse">
            <label>Input Label</label>
            <div class="input-group">
              <input type="text" placeholder="small-9.columns" class="input-group-field" />
              <span class="input-group-label">.com</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <label>Select Box</label>
          <select>
            <option value="husker">Husker</option>
            <option value="starbuck">Starbuck</option>
            <option value="hotdog">Hot Dog</option>
            <option value="apollo">Apollo</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="large-6 medium-6 columns">
          <label>Choose Your Favorite</label>
          <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Radio 1</label>
          <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Radio 2</label>
        </div>
        <div class="large-6 medium-6 columns">
          <label>Check these out</label>
          <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
          <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <label>Textarea Label</label>
          <textarea placeholder="small-12.columns"></textarea>
        </div>
      </div>
    </form>
  </div>

  <div class="large-4 medium-4 columns">
    <h5>Try one of these buttons:</h5>
    <p><a href="#" class="button">Simple Button</a><br/>
      <a href="#" class="success button">Success Btn</a><br/>
      <a href="#" class="alert button">Alert Btn</a><br/>
      <a href="#" class="secondary button">Secondary Btn</a></p>
      <div class="callout">
        <h5>So many components, girl!</h5>
        <p>A whole kitchen sink of goodies comes with Foundation. Check out the docs to see them all, along with details on making them your own.</p>
        <a href="http://foundation.zurb.com/sites/docs/" class="small button">Go to Foundation Docs</a>
      </div>
    </div>
  </div>



  <?php include("partials/footer.php"); ?>   