$(document).ready(function() {
    // Désactiver le bouton par défaut
    $('#submitBtnFactureAddLot').prop('disabled', true);

    // Écouter les changements sur la combobox
    $('#Lot_addFacture').change(function() {
        // Vérifier si l'option par défaut est sélectionnée
        if ($(this).val() === "") {
            // Désactiver le bouton si l'option par défaut est sélectionnée
            $('#submitBtnFactureAddLot').prop('disabled', true);
        } else {
            // Activer le bouton si une autre option est sélectionnée
            $('#submitBtnFactureAddLot').prop('disabled', false);
        }
    });

    $('.delete-facture').click(function(e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien

        var confirmation = confirm("Êtes-vous sûr de vouloir fermer cette facture ?");
        if (confirmation) {
            // Si l'utilisateur confirme, soumettez le formulaire de suppression ou effectuez l'action de suppression
            window.location.href = $(this).attr('href'); // Redirige vers l'URL du bouton
        }
    });    
});

$(document).ready(function(){
	// Fonction pour convertir la date de DD_MM_YYYY à YYYY-MM-DD
    function convertDateFormat(date) {
        var parts = date.split('_');
        return parts[2] + '-' + parts[1] + '-' + parts[0];
    }

    // Analyse l'URL pour récupérer la valeur de la date
    var path = window.location.pathname;
    var pathParts = path.split('/');
    var dateFromUrl = pathParts[pathParts.length - 1]; // Supposant que la date est le dernier segment de l'URL

    // Vérifie si la date a été trouvée dans l'URL
    if (dateFromUrl) {
        // Convertit la date du format DD_MM_YYYY à YYYY-MM-DD
        var formattedDate = convertDateFormat(dateFromUrl);

        // Définit la valeur du DatePicker
        $('#datePickerLot1').val(formattedDate);
    }
	// Sélectionne l'élément input de type date par son ID
    $('#datePickerLot1').on('change', function() {
        // Récupère la date sélectionnée
        var selectedDate = $(this).val();

		// Stocke la date sélectionnée dans le localStorage
		localStorage.setItem('selectedDate', selectedDate);

        // Affiche la date sélectionnée dans la console
        console.log("Date sélectionnée : " + selectedDate);

        // Divise la date en ses composants
        var dateParts = selectedDate.split('-');

        // Réorganise les composants dans l'ordre DD_MM_YYYY
        var formattedDate = dateParts[2] + '_' + dateParts[1] + '_' + dateParts[0];

        // Redirige l'utilisateur vers la page avec la date formatée
        window.location.href = '/facture/' + formattedDate;
    });
});

$(document).ready(function(){
	// Fonction pour convertir la date de DD_MM_YYYY à YYYY-MM-DD
    function convertDateFormat(date) {
        var parts = date.split('_');
        return parts[2] + '-' + parts[1] + '-' + parts[0];
    }

    // Analyse l'URL pour récupérer la valeur de la date
    var path = window.location.pathname;
    var pathParts = path.split('/');
    var dateFromUrl = pathParts[pathParts.length - 1]; // Supposant que la date est le dernier segment de l'URL

    // Vérifie si la date a été trouvée dans l'URL
    if (dateFromUrl) {
        // Convertit la date du format DD_MM_YYYY à YYYY-MM-DD
        var formattedDate = convertDateFormat(dateFromUrl);

        // Définit la valeur du DatePicker
        $('#datePickerLots2').val(formattedDate);
    }
	// Sélectionne l'élément input de type date par son ID
    $('#datePickerLots2').on('change', function() {
        // Récupère la date sélectionnée
        var selectedDate = $(this).val();

		// Stocke la date sélectionnée dans le localStorage
		localStorage.setItem('selectedDate', selectedDate);

        // Affiche la date sélectionnée dans la console
        console.log("Date sélectionnée : " + selectedDate);

        // Divise la date en ses composants
        var dateParts = selectedDate.split('-');

        // Réorganise les composants dans l'ordre DD_MM_YYYY
        var formattedDate = dateParts[2] + '_' + dateParts[1] + '_' + dateParts[0];

        // Redirige l'utilisateur vers la page avec la date formatée
        window.location.href = '/Lots/' + formattedDate;
    });
});
