function select(config) {
    return {
        data: config.data,
        options: null,
        focusedOptionIndex: null,
        placeholder: config.placeholder ?? "select and option",
        open: false,
        value: config.value,
        closeListbox: function () {
            this.open = false;
            this.focusedOptionIndex = null;
        },

        init: function () {
            this.options = this.data;

            if (!(this.value in this.options)) this.value = null;
        },

        selectOption: function () {
            if (!this.open) return this.toggleListboxVisibility();
            this.value = Object.keys(this.options)[this.focusedOptionIndex];
            this.closeListbox();
        },

        focusNextOption: function () {
            if (this.focusedOptionIndex === null) return this.focusedOptionIndex = Object.keys(this.options).length - 1

            if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return

            this.focusedOptionIndex++

            this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                block: "center",
            })
        },

        focusPreviousOption: function () {
            if (this.focusedOptionIndex === null) return this.focusedOptionIndex = 0

            if (this.focusedOptionIndex <= 0) return

            this.focusedOptionIndex--

            this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                block: "center",
            })
        },

        toggleListboxVisibility: function () {
            if (this.open) return this.closeListbox();

            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value);

            if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0;
            this.open = true;
            this.$nextTick(() => {
                this.$refs.search.focus()

                this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                    block: "center"
                })
            })
        }
    }

};
