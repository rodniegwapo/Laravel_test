export function useSelectFilterOption () {
    const filterOptions = (input, option) => {
        const valueMatches =
            option.value.toString().toLowerCase().indexOf(input.toLowerCase()) >= 0;
        const labelMatches =
            option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        return valueMatches || labelMatches;
    };

    return {
        filterOptions
    }
}