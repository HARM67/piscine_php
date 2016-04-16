INSERT
INTO
  ft_table(
    login,
    date_de_creation,
    groupe
  )
SELECT
  nom,
  date_naissance,
  "other"
FROM
  `fiche_personne`
WHERE
  nom LIKE "%a%" AND CHAR_LENGTH(nom) < 10
ORDER BY
  nom
LIMIT 10;
