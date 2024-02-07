if (!$ScriptRoot) {
    $ScriptRoot = (Get-Item .).FullName
}

$UP_SCRIPTS = Join-Path $ScriptRoot "up";
$SPROCS_SCRIPTS = Join-Path $ScriptRoot "sprocs"

if (!(Test-Path $UP_SCRIPTS)) {
    Write-Output "UP scripts directory is not exists"
} else {
    Write-Output "Running deploy UP scripts..."

    $scripts = Get-ChildItem $UP_SCRIPTS -Recurse -Filter *.sql | Format-Table Name;

    foreach ($script IN $scripts) {
        try {
            
        }
        catch {
            
        }
    }

    Write-Output "All scripts deploy is success";
}