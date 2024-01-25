import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Link, useForm, usePage } from '@inertiajs/react';

export default function CompanyProfileSearchForm({ className }) {

    const { data, setData, post, errors, processing } = useForm({
        searchTerm: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('finance.search'));
    };

    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900">Profile</h2>

            </header>

            <form onSubmit={submit} className="mt-6 space-y-6">
                <div>
                    <InputLabel htmlFor="searchTerm" value="Search" />

                    <TextInput
                        id="searchTerm"
                        className="mt-1 block w-full"
                        placeholder="Type your search term here..."
                        value={data.searchTerm}
                        onChange={(e) => setData('searchTerm', e.target.value)}
                        isFocused
                        autoComplete="searchTerm"
                    />

                    <InputError className="mt-2" message={errors.searchTerm} />
                </div>

                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Search</PrimaryButton>
                </div>
            </form>
        </section>
    );
}
