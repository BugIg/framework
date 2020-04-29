<x-avored-field
    label="avored::system.comms.options"
>
    <avored-property-options
        :prop-options="{{ $property->dropdownOptions ?? json_encode([]) }}"
    />
</x-avored-field>
