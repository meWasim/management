import { AlertCircle, CheckCircle2, Info, TriangleAlert } from "lucide-react";

import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert";

type Variant = "success" | "error" | "warning" | "info";

interface AlertMessageProps {
    variant: Variant;
    title?: string;
    message: string;
}

export default function AlertMessage({
    variant,
    title,
    message,
}: AlertMessageProps) {
    const config = {
        success: {
            icon: CheckCircle2,
            className: "border-green-500 bg-green-50 text-green-700",
            defaultTitle: "Success",
        },
        error: {
            icon: AlertCircle,
            className: "border-red-500 bg-red-50 text-red-700",
            defaultTitle: "Error",
        },
        warning: {
            icon: TriangleAlert,
            className: "border-yellow-500 bg-yellow-50 text-yellow-700",
            defaultTitle: "Warning",
        },
        info: {
            icon: Info,
            className: "border-blue-500 bg-blue-50 text-blue-700",
            defaultTitle: "Information",
        },
    };

    const { icon: Icon, className, defaultTitle } = config[variant];

    return (
        <Alert className={className}>
            <Icon className="h-4 w-4" />

            <AlertTitle>{title ?? defaultTitle}</AlertTitle>

            <AlertDescription>{message}</AlertDescription>
        </Alert>
    );
}
