export const switchTheme = () => {
    const html = document.documentElement;
    const switcherBtn = document.querySelector('#theme-toggler');
    const isDark = html.classList.contains('dark');
    switcherBtn.innerText = isDark ? 'Light' : 'Dark';
    html.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'light' : 'dark');
}

window.addEventListener('DOMContentLoaded', () => {
    const switchThemeBtn = document.querySelector('#theme-toggler');
    const theme = localStorage.getItem('theme');
    if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.querySelector('#theme-toggler').innerText = 'Dark';
    } else {
        document.querySelector('#theme-toggler').innerText = 'Light';
    }
    switchThemeBtn.addEventListener('click', switchTheme);
})
