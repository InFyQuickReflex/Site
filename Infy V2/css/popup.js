function Confirmation()
{
    if (confirm("Voulez-vous confirmer?"))
    {
        formulaire.submit();
    }
}

function ConfirmationEng()
{
    if (confirm("Do you want to confirm?"))
    {
        formulaire.submit();
    }
}

function valideForm()
{
    return confirm("Voulez-vous confirmer?");
}
function valideFormEng()
{
    return confirm("Do you want to confirm ?");
}