=== COVID-19 Toscana ===
Contributors: covid19toscana
Tags: chart, grafici, graphs, visualization, covid-19, covid, coronavirus, italy, italia, toscana, firenze
Requires at least: 4.7
Tested up to: 5.5.1
Requires PHP: 5.4
Stable tag: 1.0.1
License: GPL v2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Plug-in per la visualizzazione dei dati COVID-19 della regione Toscana.

== Description ==
Plugin che aggiunge **tre shortcode** per la visualizzazione di grafici covid-19 per la regione Toscana:

▪ **[grafico-toscana dati="_«datiCovid»_"]** genera un grafico della Regione Toscana in cui vengono inseriti i dati specificati in _«datiCovid»_. I tipi di dato possono essere anche più di uno ma devono essere separati da una _virgola_.

▪ **[grafico-provincia provincia="_«provincia»_" dati="_«datiCovid»_"]** genera un grafico di una Provincia toscana in cui vengono inseriti i dati specificati in _«datiCovid»_. I tipi di dato di _«provincia»_ non possono essere più di uno pena la mancata visualizzazione del grafico. I tipi di dato di _«datiCovid»_ possono essere anche più di uno ma devono essere separati da una _virgola_.

▪ **[grafico-confronto-province province="_«province»_" dato="_«datoCovid»_"]** genera un grafico di più Province toscane messe a confronto rispetto al dato specificato in _«datoCovid»_. I tipi di dato di _«province»_ possono essere anche più di uno ma devono essere separati da una _virgola_. I tipi di dato di _«datoCovid»_ non possono essere più di uno pena la mancata visualizzazione del grafico.


I valori ammissibili per quanto riguarda i parametri _«datoCovid»_ e _«datiCovid»_ sono:
▪ _positivi_att_: rappresenta i casi di contagio positivi attuali sul territorio.
▪ _positivi_perc_: rappresenta il numero di persone contagiate in rapporto all’intera popolazione del territorio.
▪ _positivi_tot_: rappresenta i casi di contagio positivi cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.
▪ _positivi_inc_abs_: rappresenta i casi di contagio postivi giornalieri.
▪ _ricoveri_tot_: rappresenta i ricoveri cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.
▪ _ricoveri_inc_perc_: rappresenta l\'incremento percentuale del numero di ricoveri giornaliero.
▪ _deceduti_tot_: rappresenta il numero di deceduti cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.
▪ _deceduti_inc_abs_: rappresenta i morti registrati giornalieri.
▪ _deceduti_inc_perc_: rappresenta l\'incremento percentuale del numero di morti giornaliero.
▪ _letalita_: rappresenta la letalità (numero morti in rapporto al numero di positivi).
▪ _dimessi_: rappresenta il numero di dimessi cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.
▪ _tamponi_: rappresenta il numero di tamponi effettuati cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.
▪ _tamponi_inc_: rappresenta l\'incremento percentuale del numero di tamponi giornaliero.


I valori ammissibili per quanto riguarda i parametri _«provincia»_ e _«province»_ sono:
▪ _FI_: Provincia di Firenze.
▪ _PI_: Provincia di Pisa.
▪ _LU_: Provincia di Lucca.
▪ _AR_: Provincia di Arezzo.
▪ _LI_: Provincia di Livorno.
▪ _PT_: Provincia di Pistoia.
▪ _SI_: Provincia di Siena.
▪ _PO_: Provincia di Prato.
▪ _GR_: Provincia di Grosseto.
▪ _MS_: Provincia di Massa-Carrara.

== Credits ==
Corso Progettazione e Produzione Multimediale UniFi
Prof.: Alberto Del Bimbo
Idea: Andrea Ferracani
Sviluppo: Marco Frassineti, Pietro Longinetti

== Screenshots ==
1. Esempio di grafico con dati COVID-19 complessivi per la Toscana.
2. Impostazioni del plugin.

== Changelog ==
= 1.0 =
* First release.

= 1.0.1 =
* Add bottom padding to graph
* Fix naming conflicts with other plugins
* Fix percentage not showing properly
