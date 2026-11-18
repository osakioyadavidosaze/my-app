const searchInput = document.querySelector('#student-search');
const noResultsRow = document.querySelector('#no-results-row');
const resultCount = document.querySelector('#student-result-count');

if (searchInput) {
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLocaleLowerCase();
        const studentRows = Array.from(document.querySelectorAll('.student-row'));
        let visibleCount = 0;

        studentRows.forEach((row) => {
            const matches = row.dataset.search?.includes(query) ?? false;

            row.hidden = !matches;

            if (matches) {
                visibleCount += 1;
            }
        });

        if (noResultsRow) {
            noResultsRow.hidden = visibleCount > 0;
        }

        if (resultCount) {
            resultCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'student' : 'students'}`;
        }
    });
}
