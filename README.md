Projekt im Rahmen einer Weiterbildung durch die IBB


Referenzprojekt „PlanMyTrip“


Projektbeschreibung

Ziel des Projekts „PlanMyTrip“ ist die Erstellung einer dynamischen Webseite für die Suche von Reisezielen (Location). Die Reisewebseite soll genutzt werden zur Informationsbeschaffung, Recherche und Archivierung der Location.
Basierend auf dem Suchbegriff werden HTTP-Requests an die Web API der sozialen Reise-Webseite Triposo durchgeführt. Sie gibt dem User zunächst durch ein Dropdown-Menü die Auswahlmöglichkeit der 10 relevantesten Treffer basierend auf Ähnlichkeit und Bewertungs-Statistiken. Durch den Klick auf einen Treffer seiner Wahl schließt sich das Dropdown Menü und eine weitere Suchanfrage wird gestartet.  Dabei wird die Location ID mit den (max. 20) besten zugehörigen Sehenswürdigkeiten (Point Of Interrest) ermittelt. Die Ergebnisse werden dynamisch per JavaScript in das DOM (Document Object Model) eingefügt und so dem User angezeigt. 
Die Webseite bietet weiterhin die Option, die Ergebnisse in einer MariaDB Datenbank abspeichern zu können. Hierbei wird zunächst die Location und anschließend (wenn gewünscht) die gekoppelten POI‘s gespeichert.  
Falls keine Location vorhanden ist, erscheint eine entsprechende Fehlermeldung. Beim Speichervorgang wird ebenfalls überprüft ob die Ergebnisse bereits in der Datenbank vorhanden sind, und dementsprechende Benachrichtigungen im DOM erzeugt.
Um diese Features in Anspruch nehmen zu können wird vorab die Registrierung und Anmeldung eines Users vorausgesetzt. Die Signup/Login Formulare werden durch PHP validiert. Das Datenbank-Handling erfolgt ebenfalls mittels PHP (objektorientiert).
Zusätzlich wird dem eingeloggten User (Traveller) ermöglicht auf seine gespeicherten Inhalte zuzugreifen, Daten zu ändern, zu löschen, Notizen hinzuzufügen sowie eigene Datensätze (Location oder POI) zu erstellen. 
Die gespeicherten Werte können entweder einzeln oder als gesamte Liste per Klick auf- und zugeklappt werden.
Zu den POI‘s stehen sowohl bei den Suchanfragen als auch in der eigenen Liste eine eingebettete GoogleMaps (Modal) zur Verfügung, welches per Klick auf den jeweiligen Link durch JavaScript erzeugt wird. 
Weiterführende Links von Wikitravel, Wikivoyage und Wikipedia (Location) sind ebenfalls per Klick abrufbar.



Ausblick


Die Webseite soll nach Abschluss des Projekts weiterhin mit neuen Funktionen ausgestattet werden. Dem Traveller soll ermöglicht werden, mehrere individuelle Reiselisten mit eigenem Namen zu speichern und diese auch in Form eines generierten PDF-Dokuments abrufen zu können.
Weiterhin sollen zusätzliche Informationen u. A. zu An- und Weiterreise sowie öffentlicher Nahverkehr angezeigt werden. Dies kann jedoch einen HTTP-Request auf eine weitere Webseite zur Folge haben.
Traveller Daten sollen erweitert werden, um ein vollständiges Profil des Users zu erhalten.
