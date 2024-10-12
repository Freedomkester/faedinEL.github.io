
$('#selectAll').on('click',function(event)
{
   if(this.checked) 
    {
        $('.boxes').each(
            function()
            {
                this.checked = true;
            }
        );
    }
    else{
        $('.boxes').each(
            function()
            {
                this.checked = false;
            }
        );
    }
})
