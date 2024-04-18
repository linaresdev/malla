jQuery("[role=moon] .moon-navbar .swap-nav").bind("click", function(e)
{
    e.preventDefault();
   jQuery("[role=moon] .moon-nav").toggleClass('swap-show');
});

jQuery("[role=moon] .moon-navbar .swap-aside").bind("click", function(e)
{
    e.preventDefault();
    jQuery("[role=moon] .moon-aside").toggleClass('swap-show');
});