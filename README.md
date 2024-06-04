# La Criée Projet 2 (Groupe-01)

Il s'agit du second projet de deuxième année de BTS SIO option SLAM réalisé en PHP avec le FrameWork Symfony 7.0.

## Contexte du projet :

### Contexte générale :

La criée est située sur la commune de Plouhinec, département du Finistère (29), à proximité de la Pointe du Raz sur la zone de pêche Atlantique Nord Est. Une criée est une vente aux enchères d’une marchandise par lots. La Criée de Poulgoazec est un organisme dépendant de la Chambre de Commerce et d’Industrie (CCI) de Quimper (Concessionnaire) entretenu par le Conseil Général du Finistère (Concédant). Le site géographique de vente est identifié F-29.197.500-CE sur le quartier maritime d’Audierne (AD). 

La flotte du port d’Audierne est constituée de 40 bateaux (en grande majorité de moins de 12 mètres) qui y déposent leur pêche tous les jours. On y compte également une quinzaine de bateaux « extérieurs » qui effectuent des apports de façon irrégulière. La pêche pratiquée est qualifiée de « Petite pêche » et de « Pêche côtière », pour ces pêches l’absence du bateau du port est inférieure à 24 heures et jamais supérieure à 96 heures (ce type de pêche représente 92% de la pêche métropolitaine). La CCI de Quimper gère 7 ports en Cornouaille.

### Résultat et objectifs :

Si Poulgoazec est, sans conteste, la criée la plus petite, en tonnage, du Finistère, elle affiche un bilan financier qui n'a pas à rougir
devant les places fortes que sont les criées du sud bigouden. Depuis quelques années elle a su miser sur une production de qualité,
fruit de la pêche locale traditionnelle.

[...]

Selon son directeur, la survie de la criée implique une gestion fine des ressources, à savoir :

- Le maintien d’une flotte à Audierne/Plouhinec (maintien de l'emploi local)
- La présence de ressources humaines qualifiées pour la pêche afin de garantir la qualité des produits péchés.
- Le maintien du cours moyen en assurant la présence d’acheteurs
- La gestion de la ressource en poissons et crustacés qui relève d’une problématique nationale voire internationale (respectdes périodes de fraies).

Forte de ses atouts mais aussi consciente des enjeux, la criée de Poulgoazec veille depuis plusieurs années à la modernisation deson système d’information.

- Réduction des erreurs de calcul et de saisie sur les marquages des lots
- Accélération de la mise à disposition de l’information comptable pour les acteurs (pêcheurs, acheteurs, mareyeurs, comptable)

## Annexes :

### Extrait de l'ancien Modèle relationnel concernant le processus à automatiser (sans les MàJ des nouvelles Users Stories) :

![Extrait_ancien_Modèle_relationnel](https://github.com/MwoaA-a/LaCrieeProjet1/assets/145756714/75408d79-3888-4f07-a493-c3cfa463848b)

### Extrait du modèle entité association :

![modèle_entité_association Projet 2](https://github.com/MwoaA-a/LaCrieeProjet1/assets/145756714/1483a8f9-5e13-415d-ab02-4a7834c8035a)

### Les Users Stories à réaliser :

-	Gérer les lots destinés à l'équarrissage, envoie une liste des lots seront à récupérer dans les prochains jours.
-	Gérer les factures d’un ou plusieurs lots
-	Exporter les données de facturation vers un autre format
-	Afficher tous les lots non vendus
-	Gérer les lots associés à une facture
-	Gérer le client associé à une facture
-	Envoie de la facture au client par mail


## Ajout du projet :

Pour pouvoir tester le projet, il faut la base de données MySQL, et bien évidemment le projet.

### La Base de données MySQL :

[Base de données MySQL](bddcriee.sql)  

### Les cas D'utilisations :

[cas D'utilisations](casutil.docx)     (à télécharger car non visible sur GitHub)

### Les jeux de tests :

[jeux de tests](jeuxtests.docx)      (à télécharger car non visible sur GitHub)
