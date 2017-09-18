# Użytkowanie
Aby uruchomić skrypt należy z poziomu katalogu MarcinKoczanHRtec wywołać polecenie src/console.php. Musi ono posiadać parametry TYPE URL PATH. 

<h4>TYPE określa typ eksportu do csv.</h4>
<h4>Możliwe są dwa typy:</h4>
<ul>
<li>csv:simple (jeżeli plik istnieje jego dane są nadpisywane nowymi)</li>
<li>csv:extended (jeżeli istnieje plik, to nowe dane zostają dopisane)</li>
</ul> 

<h4>URL określa ścieżkę do RSS</h4>

<h4>PATH określa nazwę pliku. Nazwa może być podawana bez rozszerzenia csv. W przypadku podania innego rozszerzenia zostanie ono zastąpione rozszerzeniem csv.</h4>

<p>Przykładowe polecenie może wyglądać tak: <code>php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv</code><p>

# Testowanie
Phpunit. 
Napisane zostały proste testy bo dopiero się w to wdrażam :)

# Licencja
MIT
