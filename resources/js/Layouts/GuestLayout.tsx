import ApplicationLogo from '@/Components/ApplicationLogo';
import {Link} from '@inertiajs/react';
import React, {PropsWithChildren} from 'react';

interface GuestLayoutProps {
    children: React.ReactNode;
    logoUrl: string;
}

const Guest: React.FC<GuestLayoutProps> = ({children, logoUrl}) => {
    return (
        <div
            className="min-h-screen flex flex-col justify-center sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <Link href="/" className="flex justify-center">
                    <img src={logoUrl} alt="logo" className="w-1/3 self-center"/>
                </Link>
            </div>

            <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>
        </div>
    );
}

export default Guest;
