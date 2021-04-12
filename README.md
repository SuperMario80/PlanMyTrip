Projekt im Rahmen einer Weiterbildung durch die IBB

Projektbeschreibung

Ziel des Projekts „PlanMyTrip“ war die Erstellung einer dynamischen Webseite für die Suche von Reisezielen (Location).
Basierend auf dem Suchbegriff führt die Webseite HTTP- Requests an die Web API der sozialen Reisewebseite Triposo durch und gibt dem User zunächst durch ein Dropdown-Menü die Auswahlmöglichkeit der 10 relevantesten Treffer basierend auf Ähnlichkeit und Bewertungs-Statistiken. Durch den Klick auf einen Treffer seiner Wahl schließt sich das Dropdown Menü und eine weitere Suchanfrage wird gestartet. Dabei wird die Reiseziel ID und basierend auf dieser, die besten zugehörigen Sehenswürdigkeiten (Points Of Interest) ermittelt. Die Location mit den bis zu 20 Points Of Interest werden per Javascript in das DOM (Document Object Model) eingefügt und so dem User angezeigt. 
Die Webseite bietet weiterhin die Option, die Ergebnisse in einer MariaDB Datenbank abspeichern zu können, wobei Points Of Interest unmittelbar an die Location gekoppelt sind. Dies erfordert jedoch die Registrierung des Users und einen anschließenden Login. Die Signup/Login Formulare werden durch PHP validiert. Das Datenbank-Handling erfolgt mittels PHP (objektorientiert).
Zusätzlich wird dem eingeloggten User (Traveller) ermöglicht auf seine gespeicherten Inhalte zuzugreifen, Daten zu ändern, zu löschen, Notizen hinzuzufügen sowie eigene Locations und Points Of Interest zu erstellen. 
Zu den Points Of Interest stehen sowohl bei den Suchanfragen als auch in der eigenen Liste eine eingebettete GoogleMaps (Modal) zur Verfügung, welches per Klick auf den jeweiligen Link durch Javascript aufgerufen wird.

Ausblick

Die Webseite soll nach Abschluss des Projekts weiterhin mit neuen Funktionen ausgestattet werden. Dem Traveller soll ermöglicht werden, mehrere individuelle Reiselisten mit eigenem Namen zu speichern und diese auch in Form eines generierten PDF Dokuments abrufen zu können.
Weiterhin sollen zusätzliche Informationen u. A. zu An- und Weiterreise sowie öffentlicher Nahverkehr angezeigt werden. Dies kann jedoch einen HTTP-Request auf eine weitere Webseite zur Folge haben.
Traveller Daten sollen erweitert werden um ein vollständiges Profil des Users zu erhalten.
