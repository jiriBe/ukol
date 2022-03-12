function controlQuery() {
    if (confirm("Opravdu si přejete smazat tento záznam?")) {
        alert("Záznam byl smazán.");
        return true;
    }
    else {
        alert("Záznam nebyl smazán.");
        return false;
    }
}