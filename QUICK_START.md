# DEPLOY NO GITHUB PAGES

## PASSO 1: Executar estes comandos (PowerShell)

```powershell
cd "c:\Users\coraz\Área de Trabalho\PORTFOLIO"
git init
git config user.name "Seu Nome"
git config user.email "seu@email.com"
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/SEUUSUARIO/SEUUSUARIO.github.io.git
git branch -M main
git push -u origin main
```

**Substitua `SEUUSUARIO` pelo seu username do GitHub**

---

## PASSO 2: Ativar GitHub Pages

1. Abra https://github.com/SEUUSUARIO/SEUUSUARIO.github.io
2. **Settings** → **Pages**
3. Branch: `main` | Folder: `/`
4. Clique **Save**

---

## PRONTO! ✅

Site em: `https://SEUUSUARIO.github.io` (aguarde 2-5 minutos)

