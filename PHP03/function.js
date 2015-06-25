function form_check(elem)
{
    var input = elem.getElementsByTagName('input');
    var error = 0;
    for(var i = 0; i < input.length; i++)
    {
        if(input[i].type === 'text' || input[i].type === 'password')
        {
            if(input[i].value !== '')
            {
                input[i].style.border = '0px none';
            }
            else
            {
                input[i].style.border = '1px solid red';
                error++;
            }
        }
    }
    if(error !== 0)
    {
        alert('Bitte füllen Sie die roten Felder aus');
        error = 0;
        return false;
    }
    else
    {
        return true;
    }
}