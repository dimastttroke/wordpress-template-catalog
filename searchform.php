<form role="search" method="get" id="searchform" action="/search/">
    <label class="js-search" for="s"><img src="<?php echo get_template_directory_uri();?>/images/svg/search.svg" alt=""></label>
    <input type="text" name="search" name="s" id="s" value="<?php echo get_search_query() ?>" placeholder="Что будем искать?">
</form>