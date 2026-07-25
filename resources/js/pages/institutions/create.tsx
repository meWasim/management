import { Head, Link, useForm } from "@inertiajs/react";

import AlertMessage from "@/components/alert-message";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";

import { index, store } from "@/routes/institutions";

export default function Create() {
    const { data, setData, post, processing, errors } = useForm({
        name: "",
        domain: "",
    });

    const submit = (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        post(store());
    };

    return (
        <>
            <Head title="Create Institution" />

            <div className="container mx-auto max-w-2xl py-8">
                <Card>
                    <CardHeader>
                        <CardTitle>Create Institution</CardTitle>
                    </CardHeader>

                    <CardContent>
                        <form onSubmit={submit} className="space-y-6">
                            {/* Institution Name */}
                            <div className="space-y-2">
                                <Label htmlFor="name">
                                    Institution Name
                                </Label>

                                <Input
                                    id="name"
                                    placeholder="ABC School"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                />

                                {errors.name && (
                                    <AlertMessage
                                        variant="error"
                                        message={errors.name}
                                    />
                                )}
                            </div>

                            {/* Domain */}
                            <div className="space-y-2">
                                <Label htmlFor="domain">
                                    Domain Prefix
                                </Label>

                                <Input
                                    id="domain"
                                    placeholder="hello"
                                    value={data.domain}
                                    onChange={(e) =>
                                        setData(
                                            "domain",
                                            e.target.value
                                                .toLowerCase()
                                                .replace(/[^a-z0-9-]/g, "")
                                        )
                                    }
                                />

                                <p className="text-sm text-muted-foreground">
                                    Institution URL:{" "}
                                    <span className="font-medium">
                                        {data.domain || "your-school"}.xyz.com
                                    </span>
                                </p>

                                {errors.domain && (
                                    <AlertMessage
                                        variant="error"
                                        message={errors.domain}
                                    />
                                )}
                            </div>

                            <div className="flex justify-end gap-3">
                                <Button variant="outline" asChild>
                                    <Link href={index()}>
                                        Cancel
                                    </Link>
                                </Button>

                                <Button
                                    type="submit"
                                    disabled={processing}
                                >
                                    {processing
                                        ? "Creating..."
                                        : "Create Institution"}
                                </Button>
                            </div>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </>
    );
}
