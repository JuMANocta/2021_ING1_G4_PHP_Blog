DROP TABLE IF EXISTS contenu;
CREATE TABLE IF NOT EXISTS contenu(
    id int(11) NOT NULL AUTO_INCREMENT,
    titre varchar(25) NOT NULL,
    date datetime NOT NULL,
    commentaire text NOT NULL,
    photo varchar(25) NOT NULL,
    PRIMARY KEY (id)
)
ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;